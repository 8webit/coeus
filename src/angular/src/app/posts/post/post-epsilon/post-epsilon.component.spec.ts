import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostEpsilonComponent } from './post-epsilon.component';

describe('PostEpsilonComponent', () => {
  let component: PostEpsilonComponent;
  let fixture: ComponentFixture<PostEpsilonComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostEpsilonComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostEpsilonComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
