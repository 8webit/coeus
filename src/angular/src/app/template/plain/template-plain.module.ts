import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { TemplatePlainComponent} from './template-plain.component';
import { SharedModule } from '../../shared/shared.module';

@NgModule({
    imports: [
        CommonModule,
        SharedModule
    ],
    declarations: [
        TemplatePlainComponent
    ],
    exports: [
        TemplatePlainComponent
    ]
})

export class TemplatePlainModule { }
