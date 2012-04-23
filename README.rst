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

    tcpdump -l -i lo 'tcp and port 80' -w - | bsoad

Important is the ``-w -`` flag for TCPDump so that the raw binary output is
written to stdout.

You can always let tcpdump write into some file and pipe that into ``bsoad``
later, of course.


..
   Local Variables:
   mode: rst
   fill-column: 79
   End: 
   vim: et syn=rst tw=79
