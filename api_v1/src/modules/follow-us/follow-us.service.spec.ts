import { Test, TestingModule } from '@nestjs/testing';
import { FollowUsService } from './follow-us.service';

describe('FollowUsService', () => {
  let service: FollowUsService;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      providers: [FollowUsService],
    }).compile();

    service = module.get<FollowUsService>(FollowUsService);
  });

  it('should be defined', () => {
    expect(service).toBeDefined();
  });
});
