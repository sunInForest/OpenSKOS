<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace OpenSkos2;

use OpenSkos2\Namespaces\DcTerms;
use OpenSkos2\Namespaces\Rdf;
use OpenSkos2\Namespaces\Skos;
use OpenSkos2\Namespaces\OpenSkos;
use OpenSkos2\Rdf\Resource;
use OpenSkos2\Rdf\Uri;

class SkosCollection extends Resource
{

    const TYPE = Skos::SKOSCOLLECTION;

    public function __construct($uri = null)
    {
        parent::__construct($uri);
        $this->addProperty(Rdf::TYPE, new Uri(self::TYPE));
    }

    // how to add get property-reference attribute??

    public function getTitle()
    {
        if ($this->hasProperty(DcTerms::TITLE)) {
            return (string) $this->getPropertySingleValue(DcTerms::TITLE);
        } else {
            return null;
        }
    }

    public function getDescription()
    {
        if ($this->hasProperty(DcTerms::DESCRIPTION)) {
            return (string) $this->getPropertySingleValue(DcTerms::DESCRIPTION);
        } else {
            return null;
        }
    }

    public function addMetadata($existingScheme, $userUri, $tenant, $set)
    {
        parent::addMetadata($existingScheme, $userUri, $tenant, $set);
        if ($this->isPropertyEmpty(OpenSkos::SET)) {
            $this->setProperty(OpenSkos::SET, $set);
        }
    }
}
