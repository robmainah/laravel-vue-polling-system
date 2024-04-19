<?php

namespace App\Services\Votes;

use App\Repositories\VoteRepository;
use App\Models\User;

class StoreVoteService
{
    public function __construct(
        public readonly VoteRepository $voteRepository,
    ) {
    }

    public function store(User $user, array $data): void
    {
        $newData = collect($data)
            ->reject(fn ($value) => $value === null)
            ->map(fn ($value, $key) => [
                'question_id' => (int) \Str::after($key, 'question_'),
                'choice_id' => $value
            ])
            ->values();

        if (empty($newData)) {
            return;
        }

        $newData->each(fn ($value, $key) => $this->voteRepository->create($user, $value));
    }
}
