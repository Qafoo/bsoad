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

    tcpdump -l -i lo 'tcp and port 80' -w - | bsoad | bdog

Important is the ``-w -`` flag for TCPDump so that the raw binary output is
written to stdout.

You can always let tcpdump write into some file and pipe that into ``bsoad``
later, of course.

Debugging
=========

If some errors are happening record the stream originating from tcpdump and
store it. This enables you / me to debug bsoad with the same input data. You
may use ``tee`` for that, like::

    tcpdump -l -i lo 'tcp and port 80' -w - | tee /tmp/dump.pcap | bsoad | bdog

Bugs
====

Use at own risk:

- HTTP 1.0 handling does not work correctly if the server does not provide a
  content length

- There will be bugs in the TCP stream handling. Handling pcket fragmentation
  works, but:

  - This has only be tested on localhost without packet loss. SYN/ACK/FIN
    packets are mostly ignored yet. This may lead to hard-to-debug errors.

  - Some aspects of Ethernet, IP, TCP, and HTTP are ignored yet. If your stack
    uses those features this tool stack might break horribly.


..
   Local Variables:
   mode: rst
   fill-column: 79
   End: 
   vim: et syn=rst tw=79
