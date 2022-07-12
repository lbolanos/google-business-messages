<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for Businessmessages (v1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/business-communications/business-messages/home/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Businessmessages extends Google_Service
{


  public $conversations_events;
  public $conversations_messages;
  public $conversations_surveys;
  

  /**
   * Constructs the internal representation of the Businessmessages service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://businessmessages.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'businessmessages';

    $this->conversations_events = new Google_Service_Businessmessages_ConversationsEvents_Resource(
        $this,
        $this->serviceName,
        'events',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/events',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'eventId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->conversations_messages = new Google_Service_Businessmessages_ConversationsMessages_Resource(
        $this,
        $this->serviceName,
        'messages',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/messages',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'forceFallback' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'updateReceipt' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->conversations_surveys = new Google_Service_Businessmessages_ConversationsSurveys_Resource(
        $this,
        $this->serviceName,
        'surveys',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/surveys',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'surveyId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}


/**
 * The "conversations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $businessmessagesService = new Google_Service_Businessmessages(...);
 *   $conversations = $businessmessagesService->conversations;
 *  </code>
 */
class Google_Service_Businessmessages_Conversations_Resource extends Google_Service_Resource
{
}

/**
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $businessmessagesService = new Google_Service_Businessmessages(...);
 *   $events = $businessmessagesService->events;
 *  </code>
 */
class Google_Service_Businessmessages_ConversationsEvents_Resource extends Google_Service_Resource
{

  /**
   * Creates an event in a conversation. (events.create)
   *
   * @param string $parent Required. The conversation that contains the message.
   * Resolves to "conversations/{conversationId}".
   * @param Google_BusinessMessagesEvent $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string eventId The unique identifier of the event, assigned by the
   * agent. If an event has the same `eventId` as a previous event in the
   * conversation, Business Messages returns an `ALREADY_EXISTS` error.
   * @return Google_Service_Businessmessages_BusinessMessagesEvent
   */
  public function create($parent, Google_Service_Businessmessages_BusinessMessagesEvent $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Businessmessages_BusinessMessagesEvent");
  }
}
/**
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $businessmessagesService = new Google_Service_Businessmessages(...);
 *   $messages = $businessmessagesService->messages;
 *  </code>
 */
class Google_Service_Businessmessages_ConversationsMessages_Resource extends Google_Service_Resource
{

  /**
   * Sends a message from an agent to a user. If a conversation doesn't exist or
   * an agent tries to send a message in a conversation that it isn't authorized
   * to participate in, returns a `PERMISSION DENIED` error. (messages.create)
   *
   * @param string $parent Required. The conversation that contains the message.
   * Resolves to "conversations/{conversationId}".
   * @param Google_BusinessMessagesMessage $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool forceFallback Optional. A flag to send the specified fallback
   * text instead of other message content. Only available to agents that aren't
   * launched. If the flag is true and fallback text isn't specified, Business
   * Messages returns an error.
   * @return Google_Service_Businessmessages_BusinessMessagesMessage
   */
  public function create($parent, Google_Service_Businessmessages_BusinessMessagesMessage $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Businessmessages_BusinessMessagesMessage");
  }

  /**
   * Sends a receipt for a message from an agent to a user.
   * (messages.updateReceipt)
   *
   * @param string $name The name of the receipt, as set by Business Messages.
   * Resolves to "conversations/{conversationId}/messages/{messageId}/receipt",
   * where {conversationId} is the unique ID for the conversation and {messageId}
   * is the unique ID for the message.
   * @param Google_BusinessMessagesReceipt $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Businessmessages_BusinessMessagesReceipt
   */
  public function updateReceipt($name, Google_Service_Businessmessages_BusinessMessagesReceipt $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateReceipt', array($params), "Google_Service_Businessmessages_BusinessMessagesReceipt");
  }
}
/**
 * The "surveys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $businessmessagesService = new Google_Service_Businessmessages(...);
 *   $surveys = $businessmessagesService->surveys;
 *  </code>
 */
class Google_Service_Businessmessages_ConversationsSurveys_Resource extends Google_Service_Resource
{

  /**
   * Creates a customer satisfaction survey in a conversation. If an agent sends
   * multiple surveys in the same conversation within 24 hours, surveys after the
   * first return a `RESOURCE_EXHAUSTED` error. If the client doesn't support the
   * survey feature, survey returns a `FAILED_PRECONDITION` error.
   * (surveys.create)
   *
   * @param string $parent Required. The conversation that contains the survey.
   * Resolves to "conversations/{conversationId}".
   * @param Google_BusinessMessagesSurvey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string surveyId The unique identifier of the survey, assigned by
   * the agent. If a survey attempts to use the same `surveyId` as a previous
   * survey, Business Messages returns an `ALREADY_EXISTS` error.
   * @return Google_Service_Businessmessages_BusinessMessagesSurvey
   */
  public function create($parent, Google_Service_Businessmessages_BusinessMessagesSurvey $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Businessmessages_BusinessMessagesSurvey");
  }
}




class Google_Service_Businessmessages_BusinessMessagesAuthenticationRequest extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $oauthType = 'Google_Service_Businessmessages_BusinessMessagesAuthenticationRequestOauth';
  protected $oauthDataType = '';


  public function setOauth(Google_Service_Businessmessages_BusinessMessagesAuthenticationRequestOauth $oauth)
  {
    $this->oauth = $oauth;
  }
  public function getOauth()
  {
    return $this->oauth;
  }
}

class Google_Service_Businessmessages_BusinessMessagesAuthenticationRequestOauth extends Google_Collection
{
  protected $collection_key = 'scopes';
  protected $internal_gapi_mappings = array(
  );
  public $clientId;
  public $codeChallenge;
  public $codeChallengeMethod;
  public $scopes;


  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  public function getClientId()
  {
    return $this->clientId;
  }
  public function setCodeChallenge($codeChallenge)
  {
    $this->codeChallenge = $codeChallenge;
  }
  public function getCodeChallenge()
  {
    return $this->codeChallenge;
  }
  public function setCodeChallengeMethod($codeChallengeMethod)
  {
    $this->codeChallengeMethod = $codeChallengeMethod;
  }
  public function getCodeChallengeMethod()
  {
    return $this->codeChallengeMethod;
  }
  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }
  public function getScopes()
  {
    return $this->scopes;
  }
}

class Google_Service_Businessmessages_BusinessMessagesCardContent extends Google_Collection
{
  protected $collection_key = 'suggestions';
  protected $internal_gapi_mappings = array(
  );
  public $description;
  protected $mediaType = 'Google_Service_Businessmessages_BusinessMessagesMedia';
  protected $mediaDataType = '';
  protected $suggestionsType = 'Google_Service_Businessmessages_BusinessMessagesSuggestion';
  protected $suggestionsDataType = 'array';
  public $title;


  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setMedia(Google_Service_Businessmessages_BusinessMessagesMedia $media)
  {
    $this->media = $media;
  }
  public function getMedia()
  {
    return $this->media;
  }
  public function setSuggestions($suggestions)
  {
    $this->suggestions = $suggestions;
  }
  public function getSuggestions()
  {
    return $this->suggestions;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

class Google_Service_Businessmessages_BusinessMessagesCarouselCard extends Google_Collection
{
  protected $collection_key = 'cardContents';
  protected $internal_gapi_mappings = array(
  );
  protected $cardContentsType = 'Google_Service_Businessmessages_BusinessMessagesCardContent';
  protected $cardContentsDataType = 'array';
  public $cardWidth;


  public function setCardContents($cardContents)
  {
    $this->cardContents = $cardContents;
  }
  public function getCardContents()
  {
    return $this->cardContents;
  }
  public function setCardWidth($cardWidth)
  {
    $this->cardWidth = $cardWidth;
  }
  public function getCardWidth()
  {
    return $this->cardWidth;
  }
}

class Google_Service_Businessmessages_BusinessMessagesContentInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $altText;
  public $fileUrl;
  public $forceRefresh;
  public $thumbnailUrl;


  public function setAltText($altText)
  {
    $this->altText = $altText;
  }
  public function getAltText()
  {
    return $this->altText;
  }
  public function setFileUrl($fileUrl)
  {
    $this->fileUrl = $fileUrl;
  }
  public function getFileUrl()
  {
    return $this->fileUrl;
  }
  public function setForceRefresh($forceRefresh)
  {
    $this->forceRefresh = $forceRefresh;
  }
  public function getForceRefresh()
  {
    return $this->forceRefresh;
  }
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
  }
}

class Google_Service_Businessmessages_BusinessMessagesDialAction extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $phoneNumber;


  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
}

class Google_Service_Businessmessages_BusinessMessagesEvent extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $eventType;
  public $name;
  protected $representativeType = 'Google_Service_Businessmessages_BusinessMessagesRepresentative';
  protected $representativeDataType = '';


  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  public function getEventType()
  {
    return $this->eventType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRepresentative(Google_Service_Businessmessages_BusinessMessagesRepresentative $representative)
  {
    $this->representative = $representative;
  }
  public function getRepresentative()
  {
    return $this->representative;
  }
}

class Google_Service_Businessmessages_BusinessMessagesImage extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $contentInfoType = 'Google_Service_Businessmessages_BusinessMessagesContentInfo';
  protected $contentInfoDataType = '';


  public function setContentInfo(Google_Service_Businessmessages_BusinessMessagesContentInfo $contentInfo)
  {
    $this->contentInfo = $contentInfo;
  }
  public function getContentInfo()
  {
    return $this->contentInfo;
  }
}

class Google_Service_Businessmessages_BusinessMessagesLiveAgentRequest extends Google_Model
{
}

class Google_Service_Businessmessages_BusinessMessagesMedia extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $contentInfoType = 'Google_Service_Businessmessages_BusinessMessagesContentInfo';
  protected $contentInfoDataType = '';
  public $height;


  public function setContentInfo(Google_Service_Businessmessages_BusinessMessagesContentInfo $contentInfo)
  {
    $this->contentInfo = $contentInfo;
  }
  public function getContentInfo()
  {
    return $this->contentInfo;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
}

class Google_Service_Businessmessages_BusinessMessagesMessage extends Google_Collection
{
  protected $collection_key = 'suggestions';
  protected $internal_gapi_mappings = array(
  );
  public $containsRichText;
  public $fallback;
  protected $imageType = 'Google_Service_Businessmessages_BusinessMessagesImage';
  protected $imageDataType = '';
  public $messageId;
  public $name;
  protected $representativeType = 'Google_Service_Businessmessages_BusinessMessagesRepresentative';
  protected $representativeDataType = '';
  protected $richCardType = 'Google_Service_Businessmessages_BusinessMessagesRichCard';
  protected $richCardDataType = '';
  protected $suggestionsType = 'Google_Service_Businessmessages_BusinessMessagesSuggestion';
  protected $suggestionsDataType = 'array';
  public $text;


  public function setContainsRichText($containsRichText)
  {
    $this->containsRichText = $containsRichText;
  }
  public function getContainsRichText()
  {
    return $this->containsRichText;
  }
  public function setFallback($fallback)
  {
    $this->fallback = $fallback;
  }
  public function getFallback()
  {
    return $this->fallback;
  }
  public function setImage(Google_Service_Businessmessages_BusinessMessagesImage $image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function setMessageId($messageId)
  {
    $this->messageId = $messageId;
  }
  public function getMessageId()
  {
    return $this->messageId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRepresentative(Google_Service_Businessmessages_BusinessMessagesRepresentative $representative)
  {
    $this->representative = $representative;
  }
  public function getRepresentative()
  {
    return $this->representative;
  }
  public function setRichCard(Google_Service_Businessmessages_BusinessMessagesRichCard $richCard)
  {
    $this->richCard = $richCard;
  }
  public function getRichCard()
  {
    return $this->richCard;
  }
  public function setSuggestions($suggestions)
  {
    $this->suggestions = $suggestions;
  }
  public function getSuggestions()
  {
    return $this->suggestions;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}

class Google_Service_Businessmessages_BusinessMessagesOpenUrlAction extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $url;


  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

class Google_Service_Businessmessages_BusinessMessagesReceipt extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $name;
  public $receiptType;


  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReceiptType($receiptType)
  {
    $this->receiptType = $receiptType;
  }
  public function getReceiptType()
  {
    return $this->receiptType;
  }
}

class Google_Service_Businessmessages_BusinessMessagesRepresentative extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $avatarImage;
  public $displayName;
  public $representativeType;


  public function setAvatarImage($avatarImage)
  {
    $this->avatarImage = $avatarImage;
  }
  public function getAvatarImage()
  {
    return $this->avatarImage;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setRepresentativeType($representativeType)
  {
    $this->representativeType = $representativeType;
  }
  public function getRepresentativeType()
  {
    return $this->representativeType;
  }
}

class Google_Service_Businessmessages_BusinessMessagesRichCard extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $carouselCardType = 'Google_Service_Businessmessages_BusinessMessagesCarouselCard';
  protected $carouselCardDataType = '';
  protected $standaloneCardType = 'Google_Service_Businessmessages_BusinessMessagesStandaloneCard';
  protected $standaloneCardDataType = '';


  public function setCarouselCard(Google_Service_Businessmessages_BusinessMessagesCarouselCard $carouselCard)
  {
    $this->carouselCard = $carouselCard;
  }
  public function getCarouselCard()
  {
    return $this->carouselCard;
  }
  public function setStandaloneCard(Google_Service_Businessmessages_BusinessMessagesStandaloneCard $standaloneCard)
  {
    $this->standaloneCard = $standaloneCard;
  }
  public function getStandaloneCard()
  {
    return $this->standaloneCard;
  }
}

class Google_Service_Businessmessages_BusinessMessagesStandaloneCard extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $cardContentType = 'Google_Service_Businessmessages_BusinessMessagesCardContent';
  protected $cardContentDataType = '';


  public function setCardContent(Google_Service_Businessmessages_BusinessMessagesCardContent $cardContent)
  {
    $this->cardContent = $cardContent;
  }
  public function getCardContent()
  {
    return $this->cardContent;
  }
}

class Google_Service_Businessmessages_BusinessMessagesSuggestedAction extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $dialActionType = 'Google_Service_Businessmessages_BusinessMessagesDialAction';
  protected $dialActionDataType = '';
  protected $openUrlActionType = 'Google_Service_Businessmessages_BusinessMessagesOpenUrlAction';
  protected $openUrlActionDataType = '';
  public $postbackData;
  public $text;


  public function setDialAction(Google_Service_Businessmessages_BusinessMessagesDialAction $dialAction)
  {
    $this->dialAction = $dialAction;
  }
  public function getDialAction()
  {
    return $this->dialAction;
  }
  public function setOpenUrlAction(Google_Service_Businessmessages_BusinessMessagesOpenUrlAction $openUrlAction)
  {
    $this->openUrlAction = $openUrlAction;
  }
  public function getOpenUrlAction()
  {
    return $this->openUrlAction;
  }
  public function setPostbackData($postbackData)
  {
    $this->postbackData = $postbackData;
  }
  public function getPostbackData()
  {
    return $this->postbackData;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}

class Google_Service_Businessmessages_BusinessMessagesSuggestedReply extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $postbackData;
  public $text;


  public function setPostbackData($postbackData)
  {
    $this->postbackData = $postbackData;
  }
  public function getPostbackData()
  {
    return $this->postbackData;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}

class Google_Service_Businessmessages_BusinessMessagesSuggestion extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  protected $actionType = 'Google_Service_Businessmessages_BusinessMessagesSuggestedAction';
  protected $actionDataType = '';
  protected $authenticationRequestType = 'Google_Service_Businessmessages_BusinessMessagesAuthenticationRequest';
  protected $authenticationRequestDataType = '';
  protected $liveAgentRequestType = 'Google_Service_Businessmessages_BusinessMessagesLiveAgentRequest';
  protected $liveAgentRequestDataType = '';
  protected $replyType = 'Google_Service_Businessmessages_BusinessMessagesSuggestedReply';
  protected $replyDataType = '';


  public function setAction(Google_Service_Businessmessages_BusinessMessagesSuggestedAction $action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setAuthenticationRequest(Google_Service_Businessmessages_BusinessMessagesAuthenticationRequest $authenticationRequest)
  {
    $this->authenticationRequest = $authenticationRequest;
  }
  public function getAuthenticationRequest()
  {
    return $this->authenticationRequest;
  }
  public function setLiveAgentRequest(Google_Service_Businessmessages_BusinessMessagesLiveAgentRequest $liveAgentRequest)
  {
    $this->liveAgentRequest = $liveAgentRequest;
  }
  public function getLiveAgentRequest()
  {
    return $this->liveAgentRequest;
  }
  public function setReply(Google_Service_Businessmessages_BusinessMessagesSuggestedReply $reply)
  {
    $this->reply = $reply;
  }
  public function getReply()
  {
    return $this->reply;
  }
}

class Google_Service_Businessmessages_BusinessMessagesSurvey extends Google_Model
{
  protected $internal_gapi_mappings = array(
  );
  public $name;


  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
