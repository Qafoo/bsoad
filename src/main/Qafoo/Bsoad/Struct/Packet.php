<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Struct;
use Qafoo\Bsoad\Struct;

/**
 * Packet struct
 *
 * @version $Revision$
 */
class Packet extends Struct
{
    public $timestamp;

    public $srcHost;
    public $dstHost;

    public $tcpSrcPort;
    public $tcpDstPort;
    public $tcpSequence;

    public $headers = array();
    public $body;
}

