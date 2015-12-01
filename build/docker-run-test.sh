#!/usr/bin/env bash

#docker run --rm -v ../:/sellercenter-sdk -it mobly/sellercenter-sdk sellercenter-sdk/build/docker-test.sh
docker run --rm -v `pwd`/..:/sellercenter-sdk -it mobly/sellercenter-sdk sellercenter-sdk/build/docker-test.sh
#docker run --rm -v `pwd`/..:/sellercenter-sdk -it mobly/sellercenter-sdk bash
