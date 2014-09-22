<?php

namespace GrowChart\Common;

use DOMDocument;

/**
 * @author Cong Peijun <p.cong@linkorb.com>
 */
abstract class AbstractCommon
{

    protected $rootName = 'root';

    abstract protected function toArray();

    public function getSoapParams()
    {
        return $this->toArray();
    }

    public function getXmlPayload()
    {
        $xml = new DOMDocument();
        $xml->encoding = 'utf-8';

        $root = $xml->createElement($this->rootName);
        foreach ($this->toArray() as $k => $v) {
            if ($k == 'growchartid' && $v) {
                $root->setAttribute('growchartid', $v);
            }
            $ele = $xml->createElement($k, $v);
            $root->appendChild($ele);
        }

        $xml->appendChild($root);
        $xml->formatOutput = true;
        return $xml->saveXML();
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function arrayToXml($elements, $nodeName = 'item', $xml = null)
    {
        foreach ($elements as $k => $ele) {
            if (is_array($ele)) {
                $node = new \DOMElement($k);
                $this->arrayToXml($k, $ele, $node);
            } else {
                if ($ele) {
                    $node = new \DOMElement($k, $ele);
                    $xml->appendChild($node);
                }
            }
        }
    }
}
