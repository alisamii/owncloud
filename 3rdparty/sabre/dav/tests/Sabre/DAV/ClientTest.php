<?php

namespace Sabre\DAV;

require_once 'Sabre/DAV/ClientMock.php';

class ClientTest extends \PHPUnit_Framework_TestCase {

    function testConstruct() {

        $client = new ClientMock(array(
            'baseUri' => '/',
        ));

    }

    /**
     * @expectedException InvalidArgumentException
     */
    function testConstructNoBaseUri() {

        $client = new ClientMock(array());

    }

    function testRequest() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));

        $this->assertEquals('http://example.org/foo/bar/baz', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'sillybody',
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
        ), $client->curlSettings);

        $this->assertEquals(array(
            'statusCode' => 200,
            'headers' => array(
                'content-type' => 'text/plain',
            ),
            'body' => 'Hello there!'
        ), $result);


    }


    function testRequestProxy() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
            'proxy' => 'http://localhost:8000/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));

        $this->assertEquals('http://example.org/foo/bar/baz', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'sillybody',
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
            CURLOPT_PROXY => 'http://localhost:8000/',
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
        ), $client->curlSettings);

        $this->assertEquals(array(
            'statusCode' => 200,
            'headers' => array(
                'content-type' => 'text/plain',
            ),
            'body' => 'Hello there!'
        ), $result);

    }

    function testRequestCAInfo() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $client->addTrustedCertificates('bla');

        $result = $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));

        $this->assertEquals('http://example.org/foo/bar/baz', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'sillybody',
            CURLOPT_HEADER => true,
            CURLOPT_CAINFO => 'bla',
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
        ), $client->curlSettings);

    }

    function testRequestSslPeer() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $client->setVerifyPeer(true);

        $result = $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));

        $this->assertEquals('http://example.org/foo/bar/baz', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'sillybody',
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
        ), $client->curlSettings);

    }

    function testRequestAuth() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
            'userName' => 'user',
            'password' => 'password',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));

        $this->assertEquals('http://example.org/foo/bar/baz', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'sillybody',
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC | CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'user:password',
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
        ), $client->curlSettings);

        $this->assertEquals(array(
            'statusCode' => 200,
            'headers' => array(
                'content-type' => 'text/plain',
            ),
            'body' => 'Hello there!'
        ), $result);

    }

    function testRequestAuthBasic() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
            'userName' => 'user',
            'password' => 'password',
            'authType' => Client::AUTH_BASIC,
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));

        $this->assertEquals('http://example.org/foo/bar/baz', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'sillybody',
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => 'user:password',
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
        ), $client->curlSettings);

        $this->assertEquals(array(
            'statusCode' => 200,
            'headers' => array(
                'content-type' => 'text/plain',
            ),
            'body' => 'Hello there!'
        ), $result);

    }

    function testRequestAuthDigest() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
            'userName' => 'user',
            'password' => 'password',
            'authType' => Client::AUTH_DIGEST,
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));

        $this->assertEquals('http://example.org/foo/bar/baz', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'sillybody',
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_USERPWD => 'user:password',
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
        ), $client->curlSettings);

        $this->assertEquals(array(
            'statusCode' => 200,
            'headers' => array(
                'content-type' => 'text/plain',
            ),
            'body' => 'Hello there!'
        ), $result);

    }
    function testRequestError() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            CURLE_COULDNT_CONNECT,
            "Could not connect, or something"
        );

        $caught = false;
        try {
            $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));
        } catch (Exception $e) {
            $caught = true;
        }
        if (!$caught) {
            $this->markTestFailed('Exception was not thrown');
        }

    }

    function testRequestHTTPError() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 400 Bad Request",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 400,
            ),
            0,
            ""
        );

        $caught = false;
        try {
            $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));
        } catch (Exception $e) {
            $caught = true;
        }
        if (!$caught) {
            $this->fail('Exception was not thrown');
        }

    }

    function testRequestHTTP404() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 404 Not Found",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 404,
            ),
            0,
            ""
        );

        $caught = false;
        try {
            $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));
        } catch (Exception\NotFound $e) {
            $caught = true;
        }
        if (!$caught) {
            $this->fail('Exception was not thrown');
        }

    }

    /**
     * @dataProvider supportedHTTPCodes
     */
    function testSpecificHTTPErrors($error) {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 $error blabla",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 42,
                'http_code' => $error,
            ),
            0,
            ""
        );

        try {
            $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));
            $this->fail('Exception was not thrown');
        } catch (Exception $e) {
            $this->assertEquals($e->getHTTPCode(), $error);
        }


    }

    public function supportedHTTPCodes() {

        return array(
            array(400),
            array(401),
            array(402),
            array(403),
            array(404),
            array(405),
            array(409),
            array(412),
            array(416),
            array(500),
            array(501),
            array(507),
        );

    }

    function testUnsupportedHTTPError() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 580 blabla",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 42,
                'http_code' => "580"
            ),
            0,
            ""
        );

        try {
            $client->request('POST', 'baz', 'sillybody', array('Content-Type' => 'text/plain'));
            $this->fail('Exception was not thrown');
        } catch (Exception $e) {
            $this->assertEquals(500, $e->getHTTPCode());
        }


    }

    function testGetAbsoluteUrl() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/',
        ));

        $this->assertEquals(
            'http://example.org/foo/bar',
            $client->getAbsoluteUrl('bar')
        );

        $this->assertEquals(
            'http://example.org/bar',
            $client->getAbsoluteUrl('/bar')
        );

        $this->assertEquals(
            'http://example.com/bar',
            $client->getAbsoluteUrl('http://example.com/bar')
        );

    }

    function testOptions() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "DAV: feature1, feature2",
            "",
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 40,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->options();
        $this->assertEquals(
            array('feature1', 'feature2'),
            $result
        );

    }

    function testOptionsNoDav() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "",
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 20,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->options();
        $this->assertEquals(
            array(),
            $result
        );

    }

    /**
     * @expectedException InvalidArgumentException
     */
    function testPropFindNoXML() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "",
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 20,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $client->propfind('', array('{DAV:}foo','{DAV:}bar'));

    }

    function testPropFind() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "",
            "<?xml version=\"1.0\"?>",
            "<d:multistatus xmlns:d=\"DAV:\">",
            "  <d:response>",
            "    <d:href>/foo/bar/</d:href>",
            "    <d:propstat>",
            "      <d:prop>",
            "         <d:foo>hello</d:foo>",
            "      </d:prop>",
            "      <d:status>HTTP/1.1 200 OK</d:status>",
            "    </d:propstat>",
            "    <d:propstat>",
            "      <d:prop>",
            "         <d:bar />",
            "      </d:prop>",
            "      <d:status>HTTP/1.1 404 Not Found</d:status>",
            "    </d:propstat>",
            "  </d:response>",
            "</d:multistatus>",
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 19,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->propfind('', array('{DAV:}foo','{DAV:}bar'));

        $this->assertEquals(array(
            '{DAV:}foo' => 'hello',
        ), $result);

        $requestBody = array(
            '<?xml version="1.0"?>',
            '<d:propfind xmlns:d="DAV:">',
            '  <d:prop>',
            '    <d:foo />',
            '    <d:bar />',
            '  </d:prop>',
            '</d:propfind>'
        );
        $requestBody = implode("\n", $requestBody);

        $this->assertEquals($requestBody, $client->curlSettings[CURLOPT_POSTFIELDS]);

    }

    /**
     * This was reported in Issue 235.
     *
     * If no '200 Ok' properties are returned, the client will throw an
     * E_NOTICE.
     */
    function testPropFindNo200s() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "",
            "<?xml version=\"1.0\"?>",
            "<d:multistatus xmlns:d=\"DAV:\">",
            "  <d:response>",
            "    <d:href>/foo/bar/</d:href>",
            "    <d:propstat>",
            "      <d:prop>",
            "         <d:bar />",
            "      </d:prop>",
            "      <d:status>HTTP/1.1 404 Not Found</d:status>",
            "    </d:propstat>",
            "  </d:response>",
            "</d:multistatus>",
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 19,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->propfind('', array('{DAV:}foo','{DAV:}bar'));

        $this->assertEquals(array(
        ), $result);

    }

    function testPropFindDepth1CustomProp() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "",
            "<?xml version=\"1.0\"?>",
            "<d:multistatus xmlns:d=\"DAV:\" xmlns:x=\"urn:custom\">",
            "  <d:response>",
            "    <d:href>/foo/bar/</d:href>",
            "    <d:propstat>",
            "      <d:prop>",
            "         <d:foo>hello</d:foo>",
            "         <x:bar>world</x:bar>",
            "      </d:prop>",
            "      <d:status>HTTP/1.1 200 OK</d:status>",
            "    </d:propstat>",
            "  </d:response>",
            "</d:multistatus>",
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 19,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->propfind('', array('{DAV:}foo','{urn:custom}bar'),1);

        $this->assertEquals(array(
            "/foo/bar/" => array(
                '{DAV:}foo' => 'hello',
                '{urn:custom}bar' => 'world',
            ),
        ), $result);

        $requestBody = array(
            '<?xml version="1.0"?>',
            '<d:propfind xmlns:d="DAV:">',
            '  <d:prop>',
            '    <d:foo />',
            '    <x:bar xmlns:x="urn:custom"/>',
            '  </d:prop>',
            '</d:propfind>'
        );
        $requestBody = implode("\n", $requestBody);

        $this->assertEquals($requestBody, $client->curlSettings[CURLOPT_POSTFIELDS]);

    }

    function testPropPatch() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "",
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 20,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $client->proppatch('', array(
            '{DAV:}foo' => 'newvalue',
            '{urn:custom}foo' => 'newvalue2',
            '{DAV:}bar' => null,
            '{urn:custom}bar' => null,
        ));

        $requestBody = array(
            '<?xml version="1.0"?>',
            '<d:propertyupdate xmlns:d="DAV:">',
            '<d:set><d:prop>',
            '    <d:foo>newvalue</d:foo>',
            '</d:prop></d:set>',
            '<d:set><d:prop>',
            '    <x:foo xmlns:x="urn:custom">newvalue2</x:foo>',
            '</d:prop></d:set>',
            '<d:remove><d:prop>',
            '    <d:bar />',
            '</d:prop></d:remove>',
            '<d:remove><d:prop>',
            '    <x:bar xmlns:x="urn:custom"/>',
            '</d:prop></d:remove>',
            '</d:propertyupdate>'
        );
        $requestBody = implode("\n", $requestBody);

        $this->assertEquals($requestBody, $client->curlSettings[CURLOPT_POSTFIELDS]);

    }

    function testHEADRequest() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->request('HEAD', 'baz');

        $this->assertEquals('http://example.org/foo/bar/baz', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_CUSTOMREQUEST => 'HEAD',
            CURLOPT_NOBODY => true,
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array(),
            CURLOPT_POSTFIELDS => null,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
        ), $client->curlSettings);

    }

    function testPUTRequest() {

        $client = new ClientMock(array(
            'baseUri' => 'http://example.org/foo/bar/',
        ));

        $responseBlob = array(
            "HTTP/1.1 200 OK",
            "Content-Type: text/plain",
            "",
            "Hello there!"
        );

        $client->response = array(
            implode("\r\n", $responseBlob),
            array(
                'header_size' => 45,
                'http_code' => 200,
            ),
            0,
            ""
        );

        $result = $client->request('PUT', 'bar','newcontent');

        $this->assertEquals('http://example.org/foo/bar/bar', $client->url);
        $this->assertEquals(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => 'newcontent',
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => array(),
        ), $client->curlSettings);

    }
}
