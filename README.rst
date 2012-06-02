====================
Browser SOA Debugger
====================

Depending on the view of things this is just an enhanced HTTP output formatter
for tcpdump streams, or the **ultimate debugger for complex HTTP oriented SOA
architectures** which visualizes the full HTTP interactions in a readable,
reproducible way so that you can see what is actually going on in your backend.

Usage
=====

To use this thingy on localhost, do something like::

    tcpdump -l -i lo 'tcp and (port 80 or port 8983)' -w - | bsoad | bsoad-bdog

This will dump all HTTP and Solr interactions using their respective default
ports.

Important is the ``-w -`` flag for TCPDump so that the raw binary output is
written to stdout.

You can always let TCPDump write into some file and pipe that into ``bsoad``
later, of course.

Debugging
=========

If some errors are happening record the stream originating from tcpdump and
store it. This enables you / me to debug bsoad with the same input data. You
may use ``tee`` for that, like::

    tcpdump -l -i lo 'tcp and port 80' -w - | tee /tmp/dump.pcap | bsoad | bsoad-bdog

You can then replay the dump using::

    cat /tmp/dump.pcap | bsoad | bsoad-bdog

Installation
============

This project depends on bdog__ -- to install it execute these commands::

    composer.phar install
    cd src/library/qafoo/bdog
    npm install
    git submodule init
    git submodule update

__ https://github.com/qafoo/bdog

Design
======

TCPDump returns the raw TCP packets, which are then parsed and processed by
BSOAD.

.. note::
    I first tried to use tools like TShark (Wireshark CLI), but they mess up
    the HTTP traffic, omit important processing information and do not manage
    to process all HTTP interactions. So I went this "hard" way.

BSOAD the parses the Ethernet frames, which contain IP headers (IPv4 and IPv6
are supported), which then contain the TCP headers, which contain the actual
data.

On top of that BSOAD implements TCP stream handling, which takes care of TCP
packet sorting, duplicate detection and so on. The sorted packet data is then
passed on to a parser for the data.

The parser is constructed by a parser factory. Currently only a HTTP parser is
available together with a parser factory which always only will construct HTTP
parsers. But you could add support for other protocols here, together with some
magic to detect the current protocol, like Wireshark does, for example.

The HTTP parser the processes the data stream and extracts HTTP interactions
(request response tuples) from it. In HTTP 1.1 Connection Keep-Alive scenarios
there might be a bunch of them in one connection. BSOAD the converts those in
JSON which is echo'd by BSOAD -- by default on STDOUT.

BSOAD additionally returns a simplified log of all interaction on STDERR.

The returned JSON is then piped into bdog__ using a custom profile for BSOAD.
BDog opens a node.js server, connects a browser to it, which then displays the
HTTP interactions in a very convenient way.

__ https://github.com/qafoo/bdog

License
=======

We release this tool under `AGPL v3`__. Yes, we know what this means.

__ https://www.gnu.org/licenses/agpl-3.0.html

Bugs
====

- There is no proper handling of ongoing TCP interactions. If tcpdump returns
  packets of an already running TCP interaction, where bsoad does not receive
  the initial SYN packet it will abort with an error.

- There might still be errors left in TCP stream handling, if you happen to
  find one, please provide me with a stream dump. They might proove interesting
  to reproduce, though.

- There might also be problems in the HTTP parser. I am not sure about some of
  the assumptions in there. Be kind.


..
   Local Variables:
   mode: rst
   fill-column: 79
   End: 
   vim: et syn=rst tw=79
