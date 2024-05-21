<?php

declare(strict_types=1);

namespace App\Dtos;

final class NewMessage
{
    public function __construct(
        public string $content,
        public array $meta,
        public string $user,
    ) {
    }

    /**
     * @param array{
     *     content:string,
     *     meta:null|array,
     *     user:string,
     * } $data
     * @return NewMessage
     */
    public static function make(array $data): NewMessage
    {
        return new NewMessage(
            content: $data['content'],
            meta: $data['meta'] ?? [],
            user: $data['user'],
        );
    }

    /**
     * @return array{
     *     content:string,
     *     meta:null|array,
     *     user_id:string,
     * }
     */
    public function toArray(): array
    {
        return [
            'content' => $this->content,
            'meta' => $this->meta,
            'user_id' => $this->user,
        ];
    }
}
