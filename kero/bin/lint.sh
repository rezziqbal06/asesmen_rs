#!/bin/bash
cd ../../ | cd app | find . -name "*.php" -print0 | xargs -0 -n1 -P8 php -l 
