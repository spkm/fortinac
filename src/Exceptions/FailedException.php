<?php

namespace spkm\FortiNac\Exceptions;

use spkm\FortiNac\FortiNacApiException;

/**
 * FortiNAC answered a success status with an envelope whose "status" is not "success"; errorMessage() says why.
 */
class FailedException extends FortiNacApiException {}
