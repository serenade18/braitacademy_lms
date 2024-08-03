<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Insights
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Insights\V1\Call;

use Twilio\Options;
use Twilio\Values;

abstract class CallSummaryOptions
{
    /**
     * @param string $processingState 
     * @return FetchCallSummaryOptions Options builder
     */
    public static function fetch(
        
        string $processingState = Values::NONE

    ): FetchCallSummaryOptions
    {
        return new FetchCallSummaryOptions(
            $processingState
        );
    }

}

class FetchCallSummaryOptions extends Options
    {
    /**
     * @param string $processingState 
     */
    public function __construct(
        
        string $processingState = Values::NONE

    ) {
        $this->options['processingState'] = $processingState;
    }

    /**
     * 
     *
     * @param string $processingState 
     * @return $this Fluent Builder
     */
    public function setProcessingState(string $processingState): self
    {
        $this->options['processingState'] = $processingState;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Insights.V1.FetchCallSummaryOptions ' . $options . ']';
    }
}

