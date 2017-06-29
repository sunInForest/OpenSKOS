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
namespace OpenSkos2\Api\Response;

/**
 * Provide the json output for find-concepts api
 */
abstract class ResultSetResponse implements \OpenSkos2\Api\Response\ResponseInterface
{
    /**
     * @var \OpenSkos2\Api\ResourceResultSet
     */
    protected $result;
    /**
     * @var []
     */
    protected $propertiesList;
    
    /**
     * @var []
     */
    protected $excludePropertiesList;
    
      /**
     * @var []
     */
    protected $init;
    
    /**
     *
     * @param \OpenSkos2\Api\ResourceResultSet $result
     * @param array $propertiesList Properties to serialize.
     */
    public function __construct(
        \OpenSkos2\Api\ResourceResultSet $result,
        $propertiesList = null,
        $excludePropertiesList = []
    ) {
        $this->result = $result;
        $this->propertiesList = $propertiesList;
        $this->excludePropertiesList = $excludePropertiesList;
    }
    
    public function setInit($init)
    {
        $this->init=$init;
    }
}
