<?php

/* 
 * OpenSKOS
 * 
 * LICENSE
 * 
 * This source file is subject to the GPLv3 license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 * 
 * @category   OpenSKOS
 * @package    OpenSKOS
 * @copyright  Copyright (c) 2015 Picturae (http://www.picturae.com)
 * @author     Picturae
 * @license    http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 */

namespace OpenSkos2\Concept;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testMapping()
    {
        $uri = 'http://example.com/1';
        $resource = new \OpenSkos2\Rdf\Resource($uri);
        $prefLabel = new \OpenSkos2\Rdf\Literal('bla', 'nl');
        $resource->addProperty(\OpenSkos2\Namespaces\Skos::PREFLABEL, $prefLabel);
                
        $solr = new \Solarium\QueryType\Update\Query\Document\Document();
        
        $skosSolr = new \OpenSkos2\Solr\Document($resource, $solr);
        
        $doc = $skosSolr->getDocument();
        
        $label = $doc->{'s_prefLabel@nl'};
        $firstLabel = current($label);
        $this->assertEquals('bla', $firstLabel);
        $this->assertEquals($uri, $doc->uri);
    }
    
    public function testUri()
    {
        $uri = 'http://example.com/1';
        $resource = new \OpenSkos2\Rdf\Resource($uri);
        $testUri = new \OpenSkos2\Rdf\Uri('http://example.com/2');
        $resource->addProperty(\OpenSkos2\Namespaces\Skos::PREFLABEL, $testUri);
                
        $solr = new \Solarium\QueryType\Update\Query\Document\Document();
        $skosSolr = new \OpenSkos2\Solr\Document($resource, $solr);
        
        $doc = $skosSolr->getDocument();
        
        $label = $doc->{'s_prefLabel'};
        $firstLabel = current($label);
        $this->assertEquals($testUri, $firstLabel);
    }
}