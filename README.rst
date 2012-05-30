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

    tcpdump -l -i lo 'tcp and port 80' -w - | bsoad | bsoad-bdog

Important is the ``-w -`` flag for TCPDump so that the raw binary output is
written to stdout.

You can always let tcpdump write into some file and pipe that into ``bsoad``
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


Bugs
====

Use at own risk:

- There might still be errors left in TCP stream handling, if you happen to
  find one, please provide me with a stream dump. They might be interesting to
  reproduce, though.

- There might also be problems in the HTTP parser. I am not sure about some of
  the assumptions in there. Be kind.


..
   Local Variables:
   mode: rst
   fill-column: 79
   End: 
   vim: et syn=rst tw=79
