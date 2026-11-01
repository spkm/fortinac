<?php

namespace spkm\FortiNac\Exceptions;

use spkm\FortiNac\FortiNacApiException;

/**
 * FortiNAC failed (5xx, 408), or answered a success with something other than JSON.
 */
class ServerErrorException extends FortiNacApiException {}
