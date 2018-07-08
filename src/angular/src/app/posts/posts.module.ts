import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

// Modules
import {PostsRoutingModule} from './posts-routing.module';
import {SharedModule} from '../shared/shared.module';
import {PostModule} from './post/post.module';
import { SidebarsModule } from '../sidebars/sidebars.module';
import { PagingModule } from '../paging/paging.module';

// Components
import { PostsComponent } from './posts.component';
import { PostListComponent } from './post-list/post-list.component';
import { PostListItemComponent } from './post-list-item/post-list-item.component';
import { PostListItemMetaComponent } from './post-list-item-meta/post-list-item-meta.component';

@NgModule({
    imports: [
        CommonModule,
        RouterModule,
        PostsRoutingModule,
        SharedModule,
        PostModule,
        SidebarsModule,
        PagingModule
    ],
    declarations: [
         PostsComponent,
         PostListComponent,
         PostListItemComponent,
         PostListItemMetaComponent,
        ],
    exports: [
        PostsComponent,
        PostListComponent
        ]
})

export class PostsModule {}
