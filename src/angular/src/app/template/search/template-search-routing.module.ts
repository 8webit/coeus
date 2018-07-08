import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import {TemplateSearchComponent} from './template-search.component';

const routes: Routes = [
    { path: 'search', component: TemplateSearchComponent },
    { path: 'search/:term', component: TemplateSearchComponent},
    { path: 'search/:term/page/:page_index', component: TemplateSearchComponent}
];

@NgModule({
    imports: [
        RouterModule.forChild(routes),
        CommonModule
    ],
})


export class TemplateSearchRoutingModule { }