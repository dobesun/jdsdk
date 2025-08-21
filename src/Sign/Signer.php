<?php
namespace Dobesun\JdSdk\Sign;

class Signer
{
    private string $appKey;
    private string $appSecret;
    private ?string $accessToken;
    private ?string $signMethod;
    private int $timestamp;

    public function __construct(int $timestamp = 0, ?string $accessToken = null, ?string $signMethod = null)
    {
        $this->appKey      = config('jd.key');
        $this->appSecret   = config('jd.secret');
        $this->accessToken = $accessToken;
        $this->signMethod  = $signMethod;
        $this->timestamp   = $timestamp;
    }

    /**
     * 获取系统参数（不包含 appSecret）
     */
    public function getSystemParams(): array
    {
        $params = [
            'appKey'      => $this->appKey,
            'timestamp'   => $this->timestamp, // 毫秒时间戳
        ];
        if ($this->accessToken) {
            $params['accessToken'] = $this->accessToken;
        }
        if ($this->signMethod) {
            $params['signMethod'] = $this->signMethod;
        }
        return $params;
    }

    /**
     * Java 的 parameterConvert 方法等价实现
     */
    public function parameterConvert(array $systemParam, array $queryParam = [], ?string $bodyParam = null, array $pathParam = []): array
    {
        $paramMap = [];

        // 系统参数映射
        $paramMap['X-JOS-App-Key'] = $systemParam['appKey'];
        if (!empty($systemParam['accessToken'])) {
            $paramMap['X-JOS-Access-Token'] = $systemParam['accessToken'];
        }
        $paramMap['X-JOS-Timestamp'] = $systemParam['timestamp'];
        if (!empty($systemParam['signMethod'])) {
            $paramMap['X-JOS-Sign-Method'] = $systemParam['signMethod'];
        }

        // 查询参数
        foreach ($queryParam as $k => $v) {
            if (is_null($v)) {
                continue;
            }
            if (is_array($v)) {
                $paramMap[$k] = implode(',', array_map(
                    fn($item) => is_bool($item) ? ($item ? 'true' : 'false') : (string)$item,
                    $v
                ));
            } else {
                $paramMap[$k] = is_bool($v) ? ($v ? 'true' : 'false') : (string)$v;
            }
        }

        // 路径参数
        foreach ($pathParam as $k => $v) {
            $paramMap[$k] = (string)$v;
        }

        // body
        if ($bodyParam !== null && $bodyParam !== '' && $bodyParam !== '{}') {
            $paramMap['body'] = $bodyParam;
        }

        return $paramMap;
    }

    /**
     * Java 的 calculateSignature 等价实现
     */
    public function calculateSignature(array $paramMap): string
    {
        // TreeMap => PHP 的 ksort
        ksort($paramMap);

        $preSignStr = $this->appSecret;
        foreach ($paramMap as $k => $v) {
            $preSignStr .= $k . $v;
        }
        $preSignStr .= $this->appSecret;

        return strtoupper(bin2hex(md5($preSignStr, true)));
    }

    /**
     * 生成签名和系统参数（方便直接用）
     */
    public function sign(array $queryParam = [], ?string $bodyParam = null, array $pathParam = []): string
    {
        $systemParam = $this->getSystemParams();
        $signMap     = $this->parameterConvert($systemParam, $queryParam, $bodyParam, $pathParam);
        // dd($signMap);
        return $this->calculateSignature($signMap);
    }
}
