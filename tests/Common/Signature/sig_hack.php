<?php namespace SellerCenter\SDK\Common\Signature
{
    use SellerCenter\Test\SDK\Common\Signature\SignatureV1Test;

    // Hack gmdate() to returned the canned result.
    function gmdate()
    {
        if (isset($_SERVER['sdk_test_time'])) {
            switch (basename(debug_backtrace()[0]['file'])) {
                case 'SignatureV1.php':
                    return SignatureV1Test::DEFAULT_DATETIME;
            }
        }

        return call_user_func_array('gmdate', func_get_args());
    }

    function time()
    {
        if (isset($_SERVER['sdk_test_time'])) {
            return $_SERVER['sdk_test_time'] === true
                ? strtotime('December 5, 2013 00:00:00 UTC')
                : $_SERVER['sdk_test_time'];
        }

        return \time();
    }

}
