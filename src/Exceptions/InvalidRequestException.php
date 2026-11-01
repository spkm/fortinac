<?php

namespace spkm\FortiNac\Exceptions;

use spkm\FortiNac\FortiNacApiException;

/**
 * FortiNAC could not accept the request (400, 405, 406, 415, 422).
 */
class InvalidRequestException extends FortiNacApiException {}
