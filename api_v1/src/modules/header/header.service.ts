import { Injectable } from '@nestjs/common';
import { CreateHeaderDto } from './dto/create-header.dto';
import { UpdateHeaderDto } from './dto/update-header.dto';

@Injectable()
export class HeaderService {
  create(createHeaderDto: CreateHeaderDto) {
    return 'This action adds a new header';
  }

  findAll() {
    return `This action returns all header`;
  }

  findOne(id: number) {
    return `This action returns a #${id} header`;
  }

  update(id: number, updateHeaderDto: UpdateHeaderDto) {
    return `This action updates a #${id} header`;
  }

  remove(id: number) {
    return `This action removes a #${id} header`;
  }
}
