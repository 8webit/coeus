import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './home/home.component';
import { TemplateComponent } from './template/template.component';
import { ErrorComponent } from './error/error.component';
import {PostComponent} from './posts/post/post.component';
import {PostsComponent} from './posts/posts.component';

const ROUTES: Routes = [
    { path: ':slug', component: TemplateComponent },
    { path: '', component: TemplateComponent  },
    { path: '**', component: ErrorComponent }
];

@NgModule({
    imports: [RouterModule.forRoot(ROUTES)],
    exports: [RouterModule]
})

export class AppRoutingModule { }
