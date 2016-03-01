<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Network\Http\Client;
use Cake\Network\Exception\BadRequestException;

class JIPAApiComponent extends Component
{
    private $apiUrl = 'http://jipa-server.herokuapp.com/api/';

    private $http;

    public function initialize(array $config)
    {
        $this->http = new Client();
    }


    public function get(array $config = array())
    {
        $response = $this->http->get($this->buildUrl($config));

        return $response->body('json_decode');
    }

    private function buildUrl(array $config)
    {
        if (!isset($config['resource'])) {
            throw new BadRequestException('Missing resource on JIPAApiComponent->get() method');
        }

        $url = $this->apiUrl . $config['resource'] . '/';

        if (isset($config['id'])) {
            return $url . $config['id'];
        }

        if (isset($config['select'])) {
            $url .= '?select=';

            foreach ($config['select'] as $key => $value) {
                if ($key != 0) {
                    $url .= '%20';
                }

                $url .= $value;
            }
        }

        if (isset($config['filter'])) {
            foreach ($config['filter'] as $key => $value) {
                if (substr($url, -1) != '&') {
                    $url .= '&';
                }

                $url .= $key . '=' . $value;
            }
        }

        return $url;
    }
}