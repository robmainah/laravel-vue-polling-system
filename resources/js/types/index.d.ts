export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
};

export interface IPoll {
    id: number;
    title: string;
    created_at: string;
    updated_at: string;
}

export interface IQuestion {
    id: number;
    poll_id: number;
    content: string;
    created_at: string;
    updated_at: string;
    poll: IPoll;
}

