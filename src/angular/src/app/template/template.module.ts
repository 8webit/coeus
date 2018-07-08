import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import {TemplateSearchModule} from './search/template-search.module';
import { TemplatePlainModule } from './plain/template-plain.module';
import {PostsModule} from '../posts/posts.module';
import { SharedModule } from '../shared/shared.module';
import { HomeModule } from '../home/home.module';

import {TemplateComponent} from './template.component';

@NgModule({
    imports: [
        TemplateSearchModule,
        TemplatePlainModule,
        HomeModule,
        CommonModule,
        PostsModule
    ],
    declarations: [
        TemplateComponent
    ],
    exports: [
        TemplateComponent
    ]
})

export class TemplateModule { }
