import { Routes, RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';

import {PostsComponent} from './posts.component';
import {PostComponent} from './post/post.component';
import { TemplateComponent } from '../template/template.component';

const routes: Routes = [
    { path: ':slug/page/:page_index', component: PostsComponent },
    { path: 'page/:page_index', component: TemplateComponent },
    { path: 'category/:slug', redirectTo:  '/:slug'},
    { path: 'category/:slug/page/:page_index', redirectTo: '/:slug/page/:page_index'},
    { path: 'category/:slug/:child_slug', redirectTo:  '/:slug/:child_slug'},
    { path: ':slug/:child_slug', component: PostComponent }
];

@NgModule({
    imports: [RouterModule.forChild(routes)]
})
export class PostsRoutingModule {}
