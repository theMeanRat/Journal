<?php

namespace MyVisions\Journal;

class ArticlePublisher
{
    public object $article;
    public string $title;
    public string $subtitle;
    public string $introduction;
    public string $content;
    public string $image;
    public string $datePublished;
    public string $datePublishedTo;
    public bool   $isPublic;

    public function withTitle(string $title): ArticlePublisher
    {
        $this->title = $title;
        return $this;
    }

    public function withSubtitle(string $subtitle): ArticlePublisher
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function withIntroduction(string $introduction): ArticlePublisher
    {
        $this->introduction = $introduction;
        return $this;
    }

    public function withContent(string $content): ArticlePublisher
    {
        $this->content = $content;
        return $this;
    }

    public function withImage(string $image): ArticlePublisher
    {
        $this->image = $image;
        return $this;
    }

    public function publishOnDate(string $date): ArticlePublisher
    {
        $this->datePublished = $date;
        return $this;
    }

    public function unpublishOnDate(string $date): ArticlePublisher
    {
        $this->datePublishedTo = $date;
        return $this;
    }

    public function withPublicity(bool $isPublic): ArticlePublisher
    {
        $this->isPublic = $isPublic;
        return $this;
    }
}