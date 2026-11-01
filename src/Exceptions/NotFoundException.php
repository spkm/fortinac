<?php

namespace spkm\FortiNac\Exceptions;

use spkm\FortiNac\FortiNacApiException;

/**
 * FortiNAC has no record at the path (404).
 */
class NotFoundException extends FortiNacApiException {}
