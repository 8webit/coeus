import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import {ErrorComponent} from './error.component';

const routes: Routes = [
    { path: 'error', component: ErrorComponent },
    { path: 'error/:status', component: ErrorComponent },
];

@NgModule({
    imports: [ RouterModule.forChild(routes)]
})

export class ErrorRoutingModule {}
