<?php

/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/7/6
 * Time: 19:25
 */
class Mem {
    //Memcached对象
    private $m;
    //对象类型
    private $type = 'Memcached';
    //缓存时间
    private $time = 0;
    //错误
    private $error;
    //是否开启调试模式
    private $debug = 'true';

    public function __construct() {
        if (!class_exists($this->type)) {
            $this->error = 'No '.$this->type;
            return false;
        } else {
            $this->m = new $this->type;
        }
    }

    public function addServer($arr) {
        $this->m->addServers($arr);
    }

    public function s($key, $value = '', $time = NULL) {
        $number = func_num_args();
        if ($number == 1) {
            //get操作
            return $this->get($key);
        } else if ($number >= 2) {
            if ($value === NULL) {
                //delete操作
                $this->delete($key);
            } else {
                //set操作
                $this->set($key, $value, $time);
            }

        }
    }

    private function set($key, $value, $time = NULL) {
        if ($time === NULL) {
            $time = $this->time;
        }
        $this->m->set($key, $value, $time);
        if ($this->debug) {
            if ($this->m->getResultCode() != 0) {
                return false;
            }
        }
    }

    private function get($key) {
        $ret = $this->m->get($key);
        if ($this->debug) {
            if ($this->m->getResultCode() != 0) {
                return false;
            }
        }

        return $ret;
    }

    /**
     * 删除
     * @param $key
     */
    private function delete($key) {
        $this->m->delete($key);
    }

    public function getError() {
        if ($this->error) {
            return $this->error;
        } else {
            return $this->m->getResultMessage();
        }
    }

    public function d($debug) {
        $this->debug = $debug;
    }



}