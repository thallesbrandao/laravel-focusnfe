<?php
namespace Rafwell\Focusnfe;

trait FocusnfeContract
{
    protected $_config;

    protected $server = [
        'producao'=>'https://api.focusnfe.com.br',
        'homologacao'=>'http://homologacao.acrasnfe.acras.com.br'
    ];

    public function __construct($config = [])
    {
        //merge the configurations
        $this->_config = include __DIR__ . '/../config/focusnfe.php';
        $this->_config = array_merge($this->_config, config('focusnfe'));
        $this->_config = array_merge($this->_config, $config);

        return $this;
    }

    public function getServer(){
        if($this->_config['sandbox'])
            return $this->server['homologacao'];
        else
            return $this->server['producao'];
    }

}
