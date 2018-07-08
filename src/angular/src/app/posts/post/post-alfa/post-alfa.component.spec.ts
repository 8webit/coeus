import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostAlfaComponent } from './post-alfa.component';

describe('PostAlfaComponent', () => {
  let component: PostAlfaComponent;
  let fixture: ComponentFixture<PostAlfaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostAlfaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostAlfaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
