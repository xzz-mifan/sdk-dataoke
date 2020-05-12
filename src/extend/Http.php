<?php

namespace DTK\extend;

/**
 * Http网络请求
 */
class Http
{

    /** @var string 请求是用来获取数据的，只是用来查询数据 */
    const GET_METHOD = 'GET';

    /** @var string 对服务器的数据做改变，常用来数据的提交，新增操作 */
    const POST_METHOD = 'POST';


    /**
     * 发送一个POST请求
     * @param string $url 请求URI
     * @param array|string $params 传递的参数
     * @param array $options CURL的参数
     * @return mixed|string
     */
    public static function post(string $url, $params = [], array $options = [])
    {
        $req = self::sendRequest($url, $params, self::POST_METHOD, $options);
        return $req['ret'] ? $req['msg'] : '';
    }

    /**
     * 发送一个GET请求
     * @param string $url 请求URI
     * @param array|string $params 传递的参数
     * @param array $options CURL的参数
     * @return mixed|string
     */
    public static function get(string $url, $params = [], array $options = [])
    {
        $req = self::sendRequest($url, $params, self::GET_METHOD, $options);
        return $req['ret'] ? $req['msg'] : '';
    }

    /**
     * CURL发送Request请求,含POST和REQUEST
     * @param string $url 请求的链接
     * @param array|string $params 传递的参数
     * @param string $method 请求的方法
     * @param array $options CURL的参数
     * @param bool $getHeaders
     * @return array
     */
    public static function sendRequest(string $url, $params = [], $method = self::POST_METHOD, array $options = [], $getHeaders = false)
    {
        $method       = strtoupper($method);
        $protocol     = substr($url, 0, 5);
        $query_string = is_array($params) ? http_build_query($params) : $params;
        $ch           = curl_init();
        $defaults     = [];
        if ('GET' == $method) {
            $geturl                = $query_string ? $url . (stripos($url, "?") !== FALSE ? "&" : "?") . $query_string : $url;
            $defaults[CURLOPT_URL] = $geturl;
        } else {
            $defaults[CURLOPT_URL] = $url;
            if ($method == 'POST') {
                $defaults[CURLOPT_POST] = 1;
            } else {
                $defaults[CURLOPT_CUSTOMREQUEST] = $method;
            }
            $defaults[CURLOPT_POSTFIELDS] = $query_string;
        }

        $defaults[CURLOPT_HEADER]         = FALSE;
        $defaults[CURLOPT_USERAGENT]      = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.98 Safari/537.36";
        $defaults[CURLOPT_FOLLOWLOCATION] = TRUE;
        $defaults[CURLOPT_RETURNTRANSFER] = TRUE;
        $defaults[CURLOPT_CONNECTTIMEOUT] = 30;
        $defaults[CURLOPT_TIMEOUT]        = 40;

        // disable 100-continue
        if (!array_key_exists(CURLOPT_HTTPHEADER, $options)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        } else {
            array_push($options[CURLOPT_HTTPHEADER], 'Expect:');
        }

        if ('https' == $protocol) {
            $defaults[CURLOPT_SSL_VERIFYPEER] = FALSE;
            $defaults[CURLOPT_SSL_VERIFYHOST] = FALSE;
        }

        curl_setopt_array($ch, (array)$options + $defaults);

        $ret = curl_exec($ch);
        $err = curl_error($ch);
        if (FALSE === $ret || !empty($err)) {
            $errno = curl_errno($ch);
            $info  = curl_getinfo($ch);
            curl_close($ch);
            return [
                'ret'   => FALSE,
                'errno' => $errno,
                'msg'   => $err,
                'info'  => $info,
            ];
        }
        if ($getHeaders) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            if ($ret != $info)
                return $info["url"];
        }
        curl_close($ch);

        return [
            'ret' => TRUE,
            'msg' => $ret,
        ];
    }

    /**
     * 异步发送一个请求
     * @param string $url 请求的链接
     * @param array|string $params 请求的参数
     * @param string $method 请求的方法
     * @return boolean TRUE
     */
    public static function sendAsyncRequest($url, $params = [], $method = self::POST_METHOD)
    {
        $method = strtoupper($method);
        $method = $method == self::POST_METHOD ? self::POST_METHOD : self::GET_METHOD;
        //构造传递的参数
        if (is_array($params)) {
            $post_params = [];
            foreach ($params as $k => &$v) {
                if (is_array($v))
                    $v = implode(',', $v);
                $post_params[] = $k . '=' . urlencode($v);
            }
            $post_string = implode('&', $post_params);
        } else {
            $post_string = $params;
        }
        $parts = parse_url($url);
        //构造查询的参数
        if ($method == 'GET' && $post_string) {
            $parts['query'] = isset($parts['query']) ? $parts['query'] . '&' . $post_string : $post_string;
            $post_string    = '';
        }
        $parts['query'] = isset($parts['query']) && $parts['query'] ? '?' . $parts['query'] : '';
        //发送socket请求,获得连接句柄
        $fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80, $errno, $errstr, 3);
        if (!$fp)
            return FALSE;
        //设置超时时间
        stream_set_timeout($fp, 3);
        $out = "{$method} {$parts['path']}{$parts['query']} HTTP/1.1\r\n";
        $out .= "Host: {$parts['host']}\r\n";
        $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out .= "Content-Length: " . strlen($post_string) . "\r\n";
        $out .= "Connection: Close\r\n\r\n";
        if ($post_string !== '')
            $out .= $post_string;
        fwrite($fp, $out);
        //不用关心服务器返回结果
        //echo fread($fp, 1024);
        fclose($fp);
        return TRUE;
    }

    /**
     * 发送文件到客户端
     * @param string $file
     * @param bool $delaftersend
     * @param bool $exitaftersend
     */
    public static function sendToBrowser($file, $delaftersend = true, $exitaftersend = true)
    {
        if (file_exists($file) && is_readable($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment;filename = ' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check = 0, pre-check = 0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            if ($delaftersend) {
                unlink($file);
            }
            if ($exitaftersend) {
                exit;
            }
        }
    }
}
