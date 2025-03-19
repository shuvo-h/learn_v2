import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Posts',
        href: '/posts',
    },
];

export default function Posts() {
    const {posts} = usePage().props;

    const onEdit = (id: number) => {
        console.log(id);

    }
    const onDelete = (id: number) => {
        console.log(id);

    }
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Posts" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">


                <div>
                    <Link className='underline text-blue-500 mr-2' href={route('posts.create')}>Create</Link>
                </div>


                <div className="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table className="min-w-full table-auto">
                        <thead className="bg-gray-200 text-gray-600">
                            <tr>
                                <th className="py-2 px-4 border-b">ID</th>
                                <th className="py-2 px-4 border-b">Title</th>
                                <th className="py-2 px-4 border-b">Body</th>
                                <th className="py-2 px-4 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {posts.map((item) => (
                                <tr key={item.id} className="hover:bg-gray-100">
                                    <td className="py-2 px-4 border-b">{item.id}</td>
                                    <td className="py-2 px-4 border-b">{item.title}</td>
                                    <td className="py-2 px-4 border-b">{item.body}</td>
                                    <td className="py-2 px-4 border-b">
                                    <Link className='underline text-blue-500 mr-2' href={route('posts.edit',item.id)}>Edit</Link>
                                    <Link className='underline text-red-500 mr-2' href={route('posts.create')}>Delete</Link>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>


            </div>
        </AppLayout>
    );
}
