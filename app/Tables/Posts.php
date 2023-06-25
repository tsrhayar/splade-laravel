<?php

namespace App\Tables;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Maatwebsite\Excel\Excel;

class Posts extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Post::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $categories = Category::pluck("name", "name")->toArray();

        $table
            ->withGlobalSearch(columns: ['title', 'slug'])
            ->column(
                sortable: true,
                key: 'title',
                canBeHidden: false,
            )
            ->column(
                key: 'category.name',
                label: 'Category',
                sortable: true
            )
            ->column('slug', sortable: true)
            ->column('actions', exportAs: false)
            ->paginate(10)
            ->searchInput(
                key: 'title',
                label: 'Find your title',
            )
            ->selectFilter(
                key: 'category.name',
                options: $categories,
                label: 'Categories',
            )
            ->export(
                label: 'Posts',
                filename: 'posts.csv',
            );
    }
}
