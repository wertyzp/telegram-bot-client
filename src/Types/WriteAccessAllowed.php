<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
from_request	Boolean	Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method requestWriteAccess
web_app_name	String	Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
from_attachment_menu	Boolean	Optional. True, if the access was granted when the bot was added to the attachment or side menu
 */

class WriteAccessAllowed extends Type
{
    protected bool $from_request;
    protected string $web_app_name;
    protected bool $from_attachment_menu;

    /**
     * Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method requestWriteAccess
     * @return bool
     */
    public function getFromRequest(): bool
    {
        return $this->from_request;
    }

    /**
     * Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
     * @return string
     */
    public function getWebAppName(): string
    {
        return $this->web_app_name;
    }

    /**
     * Optional. True, if the access was granted when the bot was added to the attachment or side menu
     * @return bool
     */
    public function getFromAttachmentMenu(): bool
    {
        return $this->from_attachment_menu;
    }
}
