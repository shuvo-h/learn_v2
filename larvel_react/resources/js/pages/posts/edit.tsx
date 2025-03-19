import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import { FormEvent, useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Post Edit',
        href: '/edit',
    },
];

export default function EditPosts() {
    const {post} = usePage().props;
    const {data,setData,errors,put} = useForm({
        title: post.title ||"",
        body: post.body ||"",
    })

    console.log(errors);

    const handleSubmit = (e:FormEvent) =>{
        e.preventDefault();
        put(route('posts.update',post.id))
    }
    
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Posts" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">


                <div>
                    <Link className='underline text-blue-500 mr-2' href={route('posts.create')}>Create</Link>
                </div>


                
                <div className="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
                    <h2 className="text-2xl font-semibold text-center mb-4">Create New Post</h2>

                    <form onSubmit={handleSubmit}>
                        <div className="mb-4">
                        <label htmlFor="title" className="block text-gray-700">Title</label>
                        <input
                            type="text"
                            id="title"
                            value={data.title}
                            onChange={(e) => setData('title',e.target.value)}
                            className="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter post title"
                           
                        />
                        <p className='text-red-400'>{ errors.title ? errors.title : ""}</p>
                        </div>

                        <div className="mb-4">
                        <label htmlFor="body" className="block text-gray-700">Body</label>
                        <textarea
                            id="body"
                            value={data.body}
                            onChange={(e) => setData('body',e.target.value)}
                            className="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter post body"
                            rows={5}
                        />
                        <p className='text-red-400'>{ errors.body ? errors.body : ""}</p>
                        </div>

                        <div className="flex justify-center">
                        <button
                            type="submit"
                            className="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        >
                            Update Post
                        </button>
                        </div>
                    </form>
                    </div>


            </div>
        </AppLayout>
    );
}
