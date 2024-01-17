import { Injectable } from '@nestjs/common';
import { CreateFollowUsDto } from './dto/create-follow-us.dto';
import { UpdateFollowUsDto } from './dto/update-follow-us.dto';

@Injectable()
export class FollowUsService {
  create(createFollowUsDto: CreateFollowUsDto) {
    return 'This action adds a new followUs';
  }

  findAll() {
    return `This action returns all followUs`;
  }

  findOne(id: number) {
    return `This action returns a #${id} followUs`;
  }

  update(id: number, updateFollowUsDto: UpdateFollowUsDto) {
    return `This action updates a #${id} followUs`;
  }

  remove(id: number) {
    return `This action removes a #${id} followUs`;
  }
}
