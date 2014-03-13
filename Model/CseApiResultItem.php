<?php

namespace Carminato\GoogleCseBundle\Model;

class CseApiResultItem implements CseApiResultInterface
{
    private $kind;

    private $title;

    private $htmlTitle;

    private $link;

    private $displayLink;

    private $snippet;

    private $htmlSnippet;

    private $cacheId;

    private $formattedUrl;

    private $pagemap;

    /**
     * @param string $cacheId
     */
    public function setCacheId($cacheId)
    {
        $this->cacheId = $cacheId;
    }

    /**
     * @return string
     */
    public function getCacheId()
    {
        return $this->cacheId;
    }

    /**
     * @param string $displayLink
     */
    public function setDisplayLink($displayLink)
    {
        $this->displayLink = $displayLink;
    }

    /**
     * @return string
     */
    public function getDisplayLink()
    {
        return $this->displayLink;
    }

    /**
     * @param string $formattedUrl
     */
    public function setFormattedUrl($formattedUrl)
    {
        $this->formattedUrl = $formattedUrl;
    }

    /**
     * @return string
     */
    public function getFormattedUrl()
    {
        return $this->formattedUrl;
    }

    /**
     * @param string $htmlSnippet
     */
    public function setHtmlSnippet($htmlSnippet)
    {
        $this->htmlSnippet = $htmlSnippet;
    }

    /**
     * @return string
     */
    public function getHtmlSnippet()
    {
        return $this->htmlSnippet;
    }

    /**
     * @param string $htmlTitle
     */
    public function setHtmlTitle($htmlTitle)
    {
        $this->htmlTitle = $htmlTitle;
    }

    /**
     * @return string
     */
    public function getHtmlTitle()
    {
        return $this->htmlTitle;
    }

    /**
     * @param string $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $pagemap
     */
    public function setPagemap($pagemap)
    {
        $this->pagemap = $pagemap;
    }

    /**
     * @return string
     */
    public function getPagemap()
    {
        return $this->pagemap;
    }

    /**
     * @param string $snippet
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return string
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


} 