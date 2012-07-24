<?php
/**
 * Submits one or several jobs to translate.
 */

require_once '../init.php';

// TODO: this example assumes you replaced the 2 values below.
$api_key = 'your-public-api-key';
$private_key = 'your private-api-key';

$job1 = array(
        'type' => 'text',
        'slug' => 'API Job test',
        'body_src' => 'First test.',
        'lc_src' => 'en',
        'lc_tgt' => 'ja',
        'tier' => 'standard',
        // 'force' => 1, // optional. Default to 0.
        // 'auto_approve' => 1, // optional. Default to 0.
        'custom_data' => '1234567日本語'
        );

$job2 = array(
        'type' => 'text',
        'slug' => 'API Job test',
        'body_src' => 'second test.',
        'lc_src' => 'en',
        'lc_tgt' => 'ja',
        'tier' => 'standard',
        // 'force' => 1, // optional. Default to 0.
        // 'auto_approve' => 1, // optional. Default to 0.
        'custom_data' => '1234567日本語'
        );

$jobs = array($job1, $job2);

// Get an instance of Jobs Client
$job_client = myGengo_Api::factory('jobs', $api_key, $private_key);

// Post the jobs. The second parameter is optional and determinates whether or
// not the jobs are submitted as a group (default: false).
$job_client->postJobs($jobs, true);

// Display the server response.
echo $job_client->getResponseBody();

/**
 * Typical response while the jobs are being processed in the queue:
 {"opstat":"ok","response":{"group_id":16822,"order_id":"102285","job_count":2,"credits_used":"0.20","currency":"USD"}}

* Typical response once the jobs are done (same call on the same jobs with force not set to 1)

{"opstat":"ok","response":{"jobs":[[{"job_id":"218344","slug":"API Job test","body_src":"First test.","lc_src":"en","lc_tgt":"ja","unit_count":"2","tier":"standard","credits":"0.10","currency":"USD","status":"available","eta":25308,"ctime":1343120409,"auto_approve":"0","custom_data":"1234567\u65e5\u672c\u8a9e","body_tgt":"\u6700\u521d\u306e\u30c6\u30b9\u30c8\u3002","mt":1},{"job_id":"218347","slug":"API Job test","body_src":"First test.","lc_src":"en","lc_tgt":"ja","unit_count":"2","tier":"standard","credits":"0.10","currency":"USD","status":"available","eta":25308,"ctime":1343121049,"auto_approve":"0","custom_data":"1234567\u65e5\u672c\u8a9e","body_tgt":"\u6700\u521d\u306e\u30c6\u30b9\u30c8\u3002","mt":1},{"job_id":"218348","slug":"API Job test","body_src":"First test.","lc_src":"en","lc_tgt":"ja","unit_count":"2","tier":"standard","credits":"0.10","currency":"USD","status":"available","eta":25308,"ctime":1343121082,"auto_approve":"0","custom_data":"1234567\u65e5\u672c\u8a9e","body_tgt":"\u6700\u521d\u306e\u30c6\u30b9\u30c8\u3002","mt":1}],[{"job_id":"218345","slug":"API Job test","body_src":"second test.","lc_src":"en","lc_tgt":"ja","unit_count":"2","tier":"standard","credits":"0.10","currency":"USD","status":"available","eta":25308,"ctime":1343120409,"auto_approve":"0","custom_data":"1234567\u65e5\u672c\u8a9e","body_tgt":"2 \u756a\u76ee\u306e\u30c6\u30b9\u30c8\u3002","mt":1},{"job_id":"218346","slug":"API Job test","body_src":"second test.","lc_src":"en","lc_tgt":"ja","unit_count":"2","tier":"standard","credits":"0.10","currency":"USD","status":"available","eta":25308,"ctime":1343121049,"auto_approve":"0","custom_data":"1234567\u65e5\u672c\u8a9e","body_tgt":"2 \u756a\u76ee\u306e\u30c6\u30b9\u30c8\u3002","mt":1},{"job_id":"218349","slug":"API Job test","body_src":"second test.","lc_src":"en","lc_tgt":"ja","unit_count":"2","tier":"standard","credits":"0.10","currency":"USD","status":"available","eta":25308,"ctime":1343121082,"auto_approve":"0","custom_data":"1234567\u65e5\u672c\u8a9e","body_tgt":"2 \u756a\u76ee\u306e\u30c6\u30b9\u30c8\u3002","mt":1}]]}}
 */

?>
