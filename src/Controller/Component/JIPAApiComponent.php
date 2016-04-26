<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Network\Http\Client;
use Cake\Network\Exception\BadRequestException;

class JIPAApiComponent extends Component
{
    /**
     * The API url.
     */
    private $apiUrl = 'http://jipa-server.herokuapp.com/api/';

    /**
     * The HTTP Client used to make the request to the API.
     */
    private $http;

    public function initialize(array $config)
    {
        $this->http = new Client();
    }

    /**
     * GET request method.
     *
     * @param $config   Check buildUrl method for more details.
     */
    public function get(array $config = array())
    {
        $response = $this->http->get($this->buildUrl($config));

        if ($response->code == '404') {
            return null;
        }

        return $response->body('json_decode');
    }

    public function post(array $config = array(), array $data = array())
    {
        $response = $this->http->post(
            $this->buildUrl($config),
            json_encode($data),
            ['headers' => ['Content-Type' => 'application/json']]
        );

        return $response->code == '201';
    }

    /**
     * PUT request method.
     *
     * @param $config   Check buildUrl method for more details.
     * @param $data     The data to be updated.
     */
    public function put(array $config = array(), array $data = array())
    {
        $response = $this->http->put(
            $this->buildUrl($config),
            json_encode($data),
            ['headers' => ['Content-Type' => 'application/json']]
        );

        return $response->isOk();
    }

    /**
     * DELETE request method.
     *
     * @param $config   Check buildUrl method for more details.
     */
    public function delete(array $config = array())
    {
        $response = $this->http->delete($this->buildUrl($config));

        return $response->code == '204' || $response->isOk();
    }

    /**
     * Build the url based on the $config parameters.
     *
     * Parameters used are:
     *     resource     [required]   the resource to look for
     *     id           [optional]   the id of the resource you want
     *     select       [optional]   to get only some attributes
     *     filter       [optional]   to filter the search
     *     populate     [optional]   populate the relationship
     */
    private function buildUrl(array $config)
    {
        if (!isset($config['resource'])) {
            throw new BadRequestException('Missing resource on JIPAApiComponent->get() method');
        }

        $url = $this->apiUrl . $config['resource'] . '/';

        if (isset($config['id'])) {
            $url .= $config['id'];
        }

        $url .= '?';

        if (isset($config['select'])) {
            $url .= 'select=';

            foreach ($config['select'] as $key => $value) {
                if ($key != 0) {
                    $url .= '%20';
                }

                $url .= $value;
            }

            $url .= '&';
        }

        if (isset($config['filter'])) {
            foreach ($config['filter'] as $key => $value) {
                $url .= $key . '=' . $value;
            }

            $url .= '&';
        }

        if (isset($config['populate'])) {
            $url .= 'populate=' . $config['populate'];
        }

        return $url;
    }
}
