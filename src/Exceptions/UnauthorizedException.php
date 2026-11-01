<?php

namespace spkm\FortiNac\Exceptions;

use spkm\FortiNac\FortiNacApiException;

/**
 * FortiNAC refused the token, the caller's address, or the admin profile lacks the permission for the operation
 * (401, 403).
 */
class UnauthorizedException extends FortiNacApiException {}
