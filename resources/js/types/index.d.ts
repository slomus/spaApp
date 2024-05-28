export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export interface Student {
    id: number;
    first_name: string;
    last_name: string;
    index: string;
    email: string;
    age: number;
    description: string;
    paid: boolean;

}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    students: Student
};