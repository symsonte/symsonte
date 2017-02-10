<?php

namespace Symsonte\Http\Server\Request;

use Symsonte\Http\Server\GetRequest;
use Symsonte\Http\Server\PostRequest;

/**
 * @author Yosmany Garcia <yosmanyga@gmail.com>
 *
 * @ds\service({
 *     private: true,
 *     tags: ['symsonte.http.server.request.matcher']
 * })
 *
 * @di\service({
 *     private: true,
 *     tags: ['symsonte.http.server.request.matcher']
 * })
 */
class MethodMatcher implements Matcher
{
    /**
     * {@inheritdoc}
     */
    public function match($match, $request)
    {
        if (!$match instanceof MethodMatch) {
            throw new UnsupportedMatchException($match);
        }

        return 'GET' == $match->getMethod() && $request instanceof GetRequest
            || 'POST' == $match->getMethod() && $request instanceof PostRequest;
    }
}
