import { NgModule } from '@angular/core';
import {RouterModule, Routes} from '@angular/router';

import {AuthorComponent} from './author.component';

const routes: Routes = [
    { path: 'author/:slug', component: AuthorComponent }
];

@NgModule({
    imports: [RouterModule.forChild(routes) ]
})

export class AuthorRoutingModule {}
