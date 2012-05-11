<?php

return array (
  0 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/solr/terms?terms.fl=autocomplete&terms.regex=boss&terms.regex.flag=case_insensitive',
       'curlCommand' => 'curl -i -X \'GET\' \'http://localhost:8983/solr/terms?terms.fl=autocomplete&terms.regex=boss&terms.regex.flag=case_insensitive\' -H \'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:12.0) Gecko/20100101 Firefox/12.0\' -H \'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\' -H \'Accept-Language: en-us,en;q=0.5\' -H \'Accept-Encoding: gzip, deflate\' -H \'Connection: keep-alive\' -H \'Cookie: JSESSIONID=1i75gn9g1ejdxc0f0pvkm9nhj\' -H \'Cache-Control: max-age=0\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /solr/terms?terms.fl=autocomplete&terms.regex=boss&terms.regex.flag=case_insensitive HTTP/1.1',
        1 => 'Host: localhost:8983',
        2 => 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:12.0) Gecko/20100101 Firefox/12.0',
        3 => 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        4 => 'Accept-Language: en-us,en;q=0.5',
        5 => 'Accept-Encoding: gzip, deflate',
        6 => 'Connection: keep-alive',
        7 => 'Cookie: JSESSIONID=1i75gn9g1ejdxc0f0pvkm9nhj',
        8 => 'Cache-Control: max-age=0',
      ),
       'headers' => 
      array (
        'Host' => 'localhost:8983',
        'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:12.0) Gecko/20100101 Firefox/12.0',
        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Language' => 'en-us,en;q=0.5',
        'Accept-Encoding' => 'gzip, deflate',
        'Connection' => 'keep-alive',
        'Cookie' => 'JSESSIONID=1i75gn9g1ejdxc0f0pvkm9nhj',
        'Cache-Control' => 'max-age=0',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'Content-Type: application/xml; charset=UTF-8',
        2 => 'Transfer-Encoding: chunked',
      ),
       'headers' => 
      array (
        'Content-Type' => 'application/xml; charset=UTF-8',
        'Transfer-Encoding' => 'chunked',
      ),
       'body' => '<?xml version="1.0" encoding="UTF-8"?>
<response>
<lst name="responseHeader"><int name="status">0</int><int name="QTime">5</int></lst><lst name="terms"><lst name="autocomplete"/></lst>
</response>
',
    )),
  )),
);

