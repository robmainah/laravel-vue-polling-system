<?php

namespace App\Services\Votes;

use App\Repositories\VoteRepository;
use App\Models\User;
use App\Models\Vote;

class StoreVoteService
{
    public function __construct(
        public readonly VoteRepository $voteRepository,
    ) {
    }

    public function store(User $user, array $data): ?Vote
    {
        $newData = collect($data)
            ->reject(fn ($value) => $value === null)
            ->mapWithKeys(fn ($value, $key) => [
                'question_id' => (int) \Str::after($key, 'question_'),
                'choice_id' => $value
            ])
            ->all();

        if (empty($newData)) {
            return null;
        }

        return $this->voteRepository->create($user, $newData);
    }
}
