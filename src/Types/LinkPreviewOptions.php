<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * is_disabled    Boolean    Optional. True, if the link preview is disabled
 * url    String    Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
 * prefer_small_media    Boolean    Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
 * prefer_large_media    Boolean    Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
 * show_above_text    Boolean    Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be shown below the message text
 */
class LinkPreviewOptions extends Type
{
    protected ?bool $is_disabled = null;
    protected ?string $url = null;
    protected ?bool $prefer_small_media = null;
    protected ?bool $prefer_large_media = null;
    protected ?bool $show_above_text = null;

    public function setIsDisabled(bool $is_disabled): self
    {
        $this->is_disabled = $is_disabled;

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function setPreferSmallMedia(bool $prefer_small_media): self
    {
        $this->prefer_small_media = $prefer_small_media;

        return $this;
    }

    public function setPreferLargeMedia(bool $prefer_large_media): self
    {
        $this->prefer_large_media = $prefer_large_media;

        return $this;
    }

    public function setShowAboveText(bool $show_above_text): self
    {
        $this->show_above_text = $show_above_text;

        return $this;
    }
}
